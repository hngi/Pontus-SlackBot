const http = require('http');
const SlackBot = require('slackbots');
const axios = require('axios');
const dotenv = require('dotenv');
const uuidv4 = require('uuid/v4');

dotenv.config();

const port = process.env.PORT || 3000;

// Create a simple server
const server = http.createServer(function (req, res) {
  res.writeHead(200, {
    'Content-type': 'text/plain',
  });
  res.end(
    `Pontus reporting...... The decepticons are live at port: ${port}. The revolution will be televised`
  );
});

server.listen(port, function () {
  console.log(
    `Pontus reporting...... The decepticons are live at port: ${port}. The revolution will be televised`
  );
});

const messages = {
  notsaved: `Your message was not saved. Please you'll need to sign up on the <https://pontus-slackbot.herokuapp.com/register.php|external drive>`,
  saved: `Your message has been saved successfully`,
  help: `Type *@pontus* with *save-this* then paste the contents you want to save or *save-history* to save the conversations in a channel`,
  whatsgood: `Nothing so exciting. Megatron been trying to fry my ass, then there's Bumblebee acting all cute with the ladies. I am safe, You? `,
  whatwho: `I am a decepticon, I devour planets on weekends. Haha . Just kidding, I help save conversations `,
  empty: `There is nothing to save here. Please ensure you have copied and pasted the content you wish to save.`,
  random: `How's it going? You can always use the help command if you need me `,
};

const emoji = {
  question: ':question:',
  worried: ':worried:',
  robot: ':robot_face:',
};

const bot = new SlackBot({
  token: `${process.env.BOT_TOKEN}`,
  name: 'pontus',
});

bot.on('start', () => {
  const params = {
    icon_emoji: ':robot_face:',
  };

  bot.postMessageToChannel(
    'random',
    'I am a decepticon, I devour planets on weekends. Haha . Just kidding, I help save conversations.',
    params
  );
});

// Error Handler
bot.on('error', err => console.log(err));

// Message Handler
bot.on('message', data => {
  if (data.type !== 'message') {
    return;
  }

  handleMessage(data);
});

// Reaponse to data
const handleMessage = async data => {
  let message = data.text;
  let channelId = data.channel;
  let userid = data.user;
  const users = await bot.users;
  const channels = await bot.channels;
  const user = findById(users, userid);
  const channel = findById(channels, channelId);

  console.log(message);
  console.log(channel);

  if (message.includes('<@UNR7910VD> save-this')) {
    let userConvo = message.replace(' save-this', '');
    const useremail = user.profile.email.toLowerCase();
    let username = user.name;
    console.log(username);

    let newMessage = {
      id: uuidv4(),
      token: `${process.env.SERVER_TOKEN}`,
      message: userConvo,
      email: useremail,
    };

    sendConvo(newMessage, useremail, username);
  } else if (message.includes('<@UNR7910VD> save-history')) {
    const useremail = user.profile.email.toLowerCase();
    let username = user.name;

    getChannelHistory(channelId, channel, useremail, username);
  } else if (message.includes('<@UNR7910VD> help')) {
    let username = user.name;

    messageUser(username, messages.help, emoji.question);
  } else if (message.includes('<@UNR7910VD>')) {
    let username = user.name;

    messageUser(username, messages.random, emoji.robot);
  } else if (
    message.includes('<@UNR7910VD> what can you do') ||
    message.includes('<@UNR7910VD> what do you do') ||
    message.includes('<@UNR7910VD> what are you')
  ) {
    let username = user.name;

    messageUser(username, messages.whatwho, emoji.robot);
  } else if (
    message.includes("<@UNR7910VD> what's up") ||
    message.includes('<@UNR7910VD> how far')
  ) {
    let username = user.name;

    messageUser(username, messages.whatsgood, emoji.robot);
  }
  // return console.log(conversations)
};

// Push messages to server
const sendConvo = (data, useremail, username) => {
  let url = 'https://pontus-slackbot.herokuapp.com/api/slackbot.php';
  let axiosConfig = {
    headers: {
      'Content-Type': 'application/json;charset=UTF-8',
      'Access-Control-Allow-Origin': '*',
    },
  };

  axios
    .post(`${url}`, data, axiosConfig)
    .then(res => {
      if (typeof res.data !== 'object') {
        messageUser(username, messages.empty, emoji.worried);
      } else if (res.data.email == useremail) {
        messageUser(username, messages.saved, emoji.robot);
      } else if (res.data.email != useremail) {
        messageUser(username, messages.notsaved, emoji.worried);
      }
      console.log('RESPONSE RECEIVED: ', res);
    })
    .catch(err => {
      console.log('AXIOS ERROR: ', err);
    });
};

// Get channel history
const getChannelHistory = async (channelId, channel, useremail, username) => {
  const token = process.env.USER_TOKEN;
  const url = 'https://slack.com/api/conversations.history';
  const urlPath = `${url}?token=${token}&channel=${channelId}&count=30&pretty=1`;
  try {
    const response = await axios.get(urlPath);
    let res = response.data.messages;
    //console.log(res);

    let history = res.map(item => {
      return {
        user: item.user,
        message: item.text,
        timestamp: new Date(item.ts * 1000).toUTCString(),
      };
    });

    let data = {
      token: `${process.env.SERVER_TOKEN}`,
      email: useremail,
      channel: channel.name,
      conversations: history,
    };

    sendConvo(data, useremail, username);

    console.log(data);
  } catch (error) {
    console.error(error);
  }
};

// Get result by Id
const findById = (array, id) => {
  return array.find(item => {
    return item.id == id;
  });
};

// Message prompts
const messageUser = (username, message, emoji) => {
  const params = {
    icon_emoji: `${emoji}`,
  };

  bot.postMessageToUser(`${username}`, `${message}`, params);
};