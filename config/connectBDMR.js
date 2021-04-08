
let conn = new MySqli({
    host: 'localhost',
    port: '3306',
    user: 'mtri4787_admin',
    passwd: '[k]I(tQ}FvTA',
    db: 'mtri4787_registration'
});

let db2 = conn.emit(false, '');

module.exports = {
    database: db2
} 