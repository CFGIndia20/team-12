exports.reply = async (req, res, next) => {
    const body = req.body;
    const session = body.session.split('/')[4];
    const source = session.split(':')[0];
    const phone = session.split(':')[1];
    const complaint = body.queryResult.parameters.complaint;
    const address = body.queryResult.parameters.location;

    

    response = {
        "fulfillmentMessages": [{
            "text": {
                "text": [
                    "We have registered your complanint. We will get back to you"
                ]
            }
        }]
    };
    res.status(200).json(response);
}