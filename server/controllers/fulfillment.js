const db = require('../util/database');
const pool = require('../util/database');
var rp = require('request-promise');


exports.reply = async (req, res, next) => {
    const body = req.body;
    // const session = body.session.split('/')[4];
    // const source = session.split(':')[0];
    // const phone = session.split(':')[1];
    const source = "dialogflow";
    const phone = "123456";
    const complaint = body.queryResult.parameters.complaint;
    const location = body.queryResult.parameters.location;

    var options = {
        method: 'POST',
        uri: 'https://84565918bf3d.ngrok.io',
        form: {
            query: complaint
        }
    };

    let pred = await rp(options);
    pred = JSON.parse(pred);

    console.log(source);
    console.log(phone);
    console.log(complaint);
    console.log(location);

    console.log(pred.sub_category);
    console.log(pred.category);

    try {
        const citizen = await pool.query('SELECT id FROM citizens WHERE phone_no = ?', [phone]);
        let ticketNumber;
        if (citizen[0].length == 0) {
            let result = await pool.query(
                'INSERT INTO citizens SET source = ?, phone_no = ?',
                [source, phone]
            );
            const citizenId = result[0].insertId;
            result = await pool.query(`INSERT INTO complaints SET source = ?, citizen_id = ?, category_id = ?,
        category_parent_id = ?, location = ?, description = ?, complaint_status_id = ?
        `, [source, citizenId, parseInt(pred.sub_category), parseInt(pred.category), location, complaint, 0]);
            ticketNumber = result[0].insertId;
            console.log(ticketNumber);
            let response = {
                "fulfillmentMessages": [{
                    "text": {
                        "text": [
                            `We have registered your complaint. Your ticket number is ${ticketNumber} .We will get back to you soon.`
                        ]
                    }
                }]
            };
            res.json(response);
        } else {
            const citizenId = citizen[0][0].id;
            const result = await pool.query(`INSERT INTO complaints SET source = ?, citizen_id = ?, category_id = ?,
        category_parent_id = ?, location = ?, description = ?, complaint_status_id = ?
        `, [source, citizenId, parseInt(pred.sub_category), parseInt(pred.category), location, complaint, 0]);
            ticketNumber = result[0].insertId;
            console.log(ticketNumber);
            let response = {
                "fulfillmentMessages": [{
                    "text": {
                        "text": [
                            `We have registered your complaint. Your ticket number is ${ticketNumber} .We will get back to you soon.`
                        ]
                    }
                }]
            };
            res.json(response);
        }
    } catch (err) {
        console.log(err);
        let response = {
            "fulfillmentMessages": [{
                "text": {
                    "text": [
                        `We have registered your complaint. Your ticket number is ${ticketNumber} .We will get back to you soon.`
                    ]
                }
            }]
        };
        res.json(response);
    }
}