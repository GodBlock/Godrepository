
let conn = new MySqli({
    host: 'localhost',
    port: '3306',
    user: ''********',',
    passwd: '********',',
    db: ''********','
});

let db2 = conn.emit(false, '');

module.exports = {
    database: db2
} 
