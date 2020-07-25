const dialogflowSessionClient =
    require('../botlib/dialogflow_session_client.js');


const projectId = process.env.DIALOGFLOW_PROJECT_ID;
const phoneNumber = process.env.TWILIO_PHONE_NUM;
const accountSid = process.env.TWILIO_ACCOUNT_SID;
const authToken = process.env.TWILIO_AUTH_TOKEN;

const client = require('twilio')(accountSid, authToken);
const MessagingResponse = require('twilio').twiml.MessagingResponse;
const sessionClient = new dialogflowSessionClient(projectId);

exports.reply = async (req, res, next) => {
    const body = req.body;
    const text = body.Body;
    const id = body.From;
    const dialogflowResponse = (await sessionClient.detectIntent(
        text, id, body)).fulfillmentText;
    const twiml = new MessagingResponse();
    const message = twiml.message(dialogflowResponse);
    res.send(twiml.toString());
}