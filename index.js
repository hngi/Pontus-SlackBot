
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
  return console.log(conversations)
}
