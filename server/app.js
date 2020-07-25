const dotenv = require('dotenv');
dotenv.config();

const express = require('express');
const app = express();

const mongoose = require('mongoose');

const bodyParser = require('body-parser');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

const twilioRoutes = require('./routes/twilio');
const fulfillmentRoutes = require('./routes/fulfillment');

app.use('/twilio', twilioRoutes);
app.use('/webhook', fulfillmentRoutes);


app.listen(process.env.PORT, () => {
    console.log(`server live on port ${process.env.PORT}`);
});
