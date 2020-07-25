const express = require('express');
const router = express.Router();
const fulfillmentController = require('../controllers/fulfillment');

router.post('/', fulfillmentController.reply);

module.exports = router;