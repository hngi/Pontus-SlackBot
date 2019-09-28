const http = require('http');
const SlackBot = require('slackbots');
const axios = require('axios')
const dotenv = require('dotenv')
const uuidv4 = require('uuid/v4');

dotenv.config()

const port = process.env.PORT || 3000;

// Create a simple server
const server = http.createServer(function (req, res) {
  res.writeHead(200, {
    "Content-type": "text/plain"
  });
  res.end(`Pontus reporting...... The decepticons are live at port: ${port}. The revolution will be televised`);
});

server.listen(port, function () {
  console.log(`Pontus reporting...... The decepticons are live at port: ${port}. The revolution will be televised`)
});

const bot = new SlackBot({
  token: `${process.env.BOT_TOKEN}`,
  name: 'saveconvo',
});

bot.on('start', () => {
  const params = {
    icon_emoji: ':robot_face:',
  };

  bot.postMessageToChannel('general', 'Pontus reporting...Here to save your convo', params);
});

// Error Handler
bot.on('error', (err) => console.log(err))

// Message Handler
bot.on('message', (data) => {
  if (data.type !== 'message') {
    return
  }

  handleMessage(data)
})

// Reaponse to data
const handleMessage = async (data) => {
  let message = data.text;

  if (message.includes(' save-this')) {
    let id = data.user;
    let userConvo = message.replace(' save-this', '')
    const users = await bot.users;
    const user = users.find(user => {
      return user.id == id
    })

    const useremail = user.profile.email.toLowerCase()
    const username = user.name

    // console.log(username);

    let newMessage = {
      id: uuidv4(),
      token: `${process.env.SERVER_TOKEN}`,
      message: userConvo,
      email: useremail
    }

    sendConvo(newMessage, useremail, username)
  } else if (message.includes(' help')) {
    runHelp()
  }
  // return console.log(conversations)
}

// Push messages to server
const sendConvo = (data, useremail, username) => {
  let url = 'https://www.gjengineer.com/pontus/pontusdrive.com/api/slackbot.php'
  let axiosConfig = {
    headers: {
      'Content-Type': 'application/json;charset=UTF-8',
      "Access-Control-Allow-Origin": "*",
    }
  };

  axios.post(`${url}`, data, axiosConfig)
    .then((res) => {
      if (res.data.email != useremail) {
        notSaved(username)
      } else if (res.data.email == useremail) {
        messageSaved(username)
      } else if (res.data == `Nothing to save
      
      
      `) {
        messageEmpty(username)
      }
      console.log("RESPONSE RECEIVED: ", res);
    })
    .catch((err) => {
      console.log("AXIOS ERROR: ", err);
    })
}

// Show Help
const runHelp = () => {
  const params = {
    icon_emoji: ':question_block:'
  }

  bot.postMessageToChannel(
    'general',
    `Type *@saveconvo* with *save-this* then paste the contents you want to save and *help* to get this instruction again`,
    params
  );
}

// Prompt on save
const messageSaved = (username) => {
  const params = {
    icon_emoji: ':robot-face:'
  }

  bot.postMessageToUser(
    `${username}`,
    `Your message has been saved successfully`,
    params
  );
}

const notSaved = (username) => {
  const params = {
    icon_emoji: ':worried:'
  }

  bot.postMessageToUser(
    `${username}`,
    `Your message was not saved. Please you'll need to sign up on the <https://gjengineer.com/pontus/pontusdrive.com/register.php|external drive>`,
    params
  );
}

const messageEmpty = (username) => {
  const params = {
    icon_emoji: ':worried:'
  }

  bot.postMessageToUser(
    `${username}`,
    `There is nothing to save here. Please ensure you have copied and pasted the content you wish to save.`,
    params
  );
}