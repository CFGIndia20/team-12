const express = require('express');
const router = express.Router();
const twilioController = require('../controllers/twilio');

router.post('/', twilioController.reply);

module.exports = router;