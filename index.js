const SlackBot = require('slackbots');
const axios = require('axios');

const bot_key = new SlackBot({
  token: 'xoxb-770573893525-757805141554-9DEXgWy77LTp2SGC6bOWOTQI',
  name: 'Jengineersbot'
});

// Initialize conversations to empty
let conversations = [];

// Start Handler
bot_key.on('start', () => {
  const params = {
    icon_emoji: ':smiley:'
  };

  bot_key.postMessageToChannel(
    'bot',
    ' @Jengineersbot! would tell you the authors name',
    params
  );
});

// Error Handler
bot_key.on('error', err => console.log(err));

// Message Handler
bot_key.on('message', data => {
  if (data.type !== 'message') {
    return;
  } 
  handleMessage(data);
  
});



// display Author
function author() {
  const params = {
    icon_emoji: ':smiley:'
  };
  const mes = `The authors name is Ugbogu Justice`;
  bot_key.postMessageToChannel('bot', mes, params);
}

// Show Help Text
function runHelp() {
  const params = {
    icon_emoji: ':question:'
  };

  bot_key.postMessageToChannel(
    'bot',
    `Type @Jengineersbot with either 'author' to get the Authours Name`,
    params
  );
}



// Reaponse to data
const handleMessage = (data) => {
  let message = data.text;
  // let userId = data.user;
  if (message.includes(' save my convo')) {
    // let username = await bot.getUser(userId)
    let newMessage = {
      id: "me",
      message: message.replace(' save my convo', ''),
    }

    conversations.push(newMessage)
    const qs = require('qs');
      axios.post('http://localhost/J-engineers_bot/save.php',  qs.stringify({
          'data': data.text,
          'newMessage': newMessage,
          'conversation': conversations
      }))
      .then((res) => {
        console.log(`statusCode: ${res.statusCode}`)
        console.log(res)
        console.log(`statusCode: ${res.data}`)
      })
      .catch((error) => {
        console.error(error)
      })
  }
  // return console.log(conversations)
}