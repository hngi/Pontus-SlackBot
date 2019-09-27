const SlackBot = require('slackbots');
const axios = require('axios')
const dotenv = require('dotenv')
const uuidv4 = require('uuid/v4');

dotenv.config()

// Initialize conversations to empty
let conversations = [];

const bot = new SlackBot({
  token: `${process.env.BOT_TOKEN}`,
  name: 'saveconvo',
});

// Need a function to determine the current channel


bot.on('start', () => {
  const params = {
    icon_emoji: ':robot_face:',
  };

  bot.postMessageToChannel('general', 'Here to save your convo', params);
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


  if (message.includes(' save my convo')) {
    let id = data.user;
    let userConvo = message.replace(' save my convo', '')
    const users = await bot.users;
    const user = users.find(user => {
      return user.id == id
    })

    const useremail = user.profile.email

    let newMessage = {
      id: uuidv4(),
      token: `${process.env.SERVER_TOKEN}`,
      message: userConvo,
      email: useremail
    }

    conversations.push(newMessage)
    sendConvo(newMessage)
    messageSaved()

  } else if (message.includes(' help')) {
    runHelp()
  }
  return console.log(conversations)
}

// Get channel
const getChannel = () => {

}

// Push messages to server
const sendConvo = (data) => {
  let status = ''
  let url = 'https://www.gjengineer.com/pontus/index.php'
  let axiosConfig = {
    headers: {
      'Content-Type': 'application/json;charset=UTF-8',
      "Access-Control-Allow-Origin": "*",
    }
  };

  axios.post(`${url}`, data, axiosConfig)
    .then((res) => {
      console.log("RESPONSE RECEIVED: ", res);
    })
    .catch((err) => {
      console.log("AXIOS ERROR: ", err);
    })
}

// Show Help
const runHelp = () => {
  const params = {
    icon_emoji: ':question:'
  }

  bot.postMessageToChannel(
    'general',
    `Type *@saveconvo* with *save my convo* then paste the contents you want to save and *help* to get this instruction again`,
    params
  );
}

// Prompt on save
const messageSaved = () => {
  const params = {
    icon_emoji: ':smile:'
  }

  bot.postMessageToChannel(
    'general',
    `Your message has been saved successfully`,
    params
  );
}

const notSaved = () => {
  const params = {
    icon_emoji: ':smile:'
  }

  bot.postMessageToChannel(
    'general',
    `Your message was not saved`,
    params
  );
}