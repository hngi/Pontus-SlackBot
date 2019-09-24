const SlackBot = require('slackbots');
const botToken = 'xoxb-771056643120-773247034999-keaJulkCWhAJq2Jw2ha10m7s'
const uuidv4 = require('uuid/v4');

// Initialize conversations to empty
let conversations = [];

const bot = new SlackBot({
  token: botToken,
  name: 'saveconvo',
});

// Need a function to determine the current channel
// Need a function to get the user that initiated the call

bot.on('start', () => {
  const params = {
    icon_emoji: ':smiley:',
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
const handleMessage = (data) => {
  let message = data.text;
  // let userId = data.user;
  if (message.includes(' save my convo')) {
    // let username = await bot.getUser(userId)
    let newMessage = {
      id: uuidv4(),
      message: message.replace(' save my convo', ''),
    }

    conversations.push(newMessage)
  }
  return console.log(conversations)
}