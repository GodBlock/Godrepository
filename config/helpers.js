let MySqli = require('mysqli');

let conn = new MySqli({
    host: 'localhost',
    port: '3306',
    user: ''********',',
    passwd: ''********',',
    db: ''********','
});

let db = conn.emit(false, '');

module.exports = {
    database: db
} 
 
