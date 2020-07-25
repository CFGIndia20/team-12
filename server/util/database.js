const mysql = require('mysql2/promise');

const pool = mysql.createPool({
    host: "",
    port: 3306,
    user: "admin",
    password: "",
    database: "janaagraha"
})

pool.on('error', (err) => {
    console.log('mysql error ', err);
})

module.exports = pool;