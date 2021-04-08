let MySqli = require('mysqli');

let conn = new MySqli({
    host: 'localhost',
    port: '3306',
    user: 'mtri4787_admin',
    passwd: '[k]I(tQ}FvTA',
    db: 'balance'
});

let db = conn.emit(false, '');

module.exports = {
    database: db
} 
 
