const db = require('../util/database');
const pool = require('../util/database');

exports.reply = async (req, res, next) => {
    const body = req.body;
    const session = body.session.split('/')[4];
    const source = session.split(':')[0];
    const phone = session.split(':')[1];
    const complaint = body.queryResult.parameters.complaint;
    const location = body.queryResult.parameters.location;

    console.log(source);
    console.log(phone);
    console.log(complaint);
    console.log(location);

    const citizen = await pool.query('SELECT id FROM citizens WHERE phone_no = ?', [phone]);
    if (citizen[0].length == 0) {
        const result = await pool.query(
            'INSERT INTO citizens SET source = ?, phone_no = ?',
            [source, phone]
        );
        const citizenId = result[0].insertId;
        await pool.query(`INSERT INTO complaints SET source = ?, citizen_id = ?, category_id = ?,
        category_parent_id = ?, location = ?, description = ?, complaint_status_id = ?
        `, [source, citizenId, 0, 0, location, complaint, 0]);
    } else {
        const citizenId = citizen[0][0].id;
        await pool.query(`INSERT INTO complaints SET source = ?, citizen_id = ?, category_id = ?,
        category_parent_id = ?, location = ?, description = ?, complaint_status_id = ?
        `, [source, citizenId, 0, 0, location, complaint, 0]);
    }
    response = {
        "fulfillmentMessages": [{
            "text": {
                "text": [
                    "We have registered your complanint. We will get back to you"
                ]
            }
        }]
    };
    res.json(response);
}