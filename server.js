const http = require('http');
const path = require('path');
const os = require('os');
const express = require('express');
const socketio = require('socket.io');
const fetchbtc = require('./fetchbtc')
const cors = require('cors');
const app = express();
const server = http.createServer(app);
const io = socketio(server);
const mysql = require('mysql');
const {database} = require('./config/helpers');
const MySQLEvents = require('@rodrigogs/mysql-events');
const PORT = process.env.PORT || 1978;
const fs = require('fs');
fs.createReadStream(`${__dirname}/server.js`, {encoding: 'utf8'})
 
// Set static folder

app.use(express.static(path.join(__dirname, 'public')));




const users = {};

 io.on('connection', socket => {
 
	//console.log('Client connected Matrix 1978');
    socket.on('login', function(data){
        console.log('user ' + data.userId + ' connected');
        // saving userId to object with socket ID
        users[socket.id] = data.userId;
      });
    
       socket.on('disconnect', function(){
        console.log('user ' + users[socket.id] + ' disconnected');
        // remove saved socket from users object
        delete users[socket.id];
      });
    
    console.log(io.sockets.server.engine.clientsCount);
   // console.log(io.sockets.sockets)    ;
     
 
setInterval( async () => {
		io.emit('subscribed-btc-prices', await fetchbtc.pushUpdates().catch(err => { console.log(err) }));
       
	}, 1000);
    
  socket.on('news_by_tables', function(data){ 


console.log(data);
  }); 
 // from activitywhatcher 
socket.on('news_by_client', function(data){

  userID= users[socket.id];
  console.log(`user ${data} data ${userID} `);

if (data == userID) {
  let config = require('./config/bdplus.js');
   

var mysql = require('mysql');
timer = Math.floor(new Date/1000) + 30;
 

let connection = mysql.createConnection(config);
let sql = `UPDATE users
           SET login_last = ?
           WHERE id = ?`;

let data = [timer, userID];

connection.query(sql, data, (error, results, fields) => {
  if (error){
    return console.error(error.message);
  }
  console.log('Rows affected:', results.affectedRows);
});
 
var sqlSelect= 'SELECT * FROM users WHERE id = ' + mysql.escape(userID);
connection.query(sqlSelect, function (err, result) {
  if (err) throw err;
  if (result.length > 0) {
    lastL = result[0].login_last;
    uname = result[0].name;
    console.log(lastL);
    console.log(timer);
  
 
  
  if (lastL =  timer ){

    console.log(`${ mysql.escape(uname)} its living on matrix`);
    io.emit('news_by_headerII', 'emitII' );

    }
  } 
});

     
    
};
});
});

 app.use(cors({
     origin: "localhost",
    credentials: true
}));
app.use(express.json());
app.use(express.urlencoded({extended: false}));

// Define some array variables
let data = Array(0);
let currentData = Array(0);

// Use Sockets to setup the connection
io.on('connection', (socket) => {
    database.table('wallet')
        .withFields(['id', 'username', 'balance'])
        .sort({id: -1})
        .getAll()
        .then(prods => {
            data = prods;
            //io.emit('initial', {prods: [...data]});
        })
        .catch(err => console.log(err));
});

 

const ora = require('ora'); // cool spinner
const { isNullOrUndefined } = require('util');
const spinner = ora({
  text: '🛸 Waiting for database events... 🛸',
  color: 'blue',
  spinner: 'dots2'

});


const program = async () => {
  const connection = mysql.createConnection({
  host:     'localhost',
  user:     'mtri4787_admin',
  password: '[k]I(tQ}FvTA'
  });

  const instance = new MySQLEvents(connection, {
    startAtEnd: true // to record only the new binary logs, if set to false or you didn'y provide it all the events will be console.logged after you start the app
  });

  await instance.start();
    
        instance.addTrigger({
    name: 'monitoring all statments',
    expression: '*', 
    statement: MySQLEvents.STATEMENTS.ALL, // you can choose only insert for example MySQLEvents.STATEMENTS.INSERT, but here we are choosing everything
         
    onEvent: e => {
        console.log(e);
     currentData = e.affectedRows;
      spinner.succeed('👽 _EVENT_ 👽');
      spinner.start();
  
       let newData;

            switch (e.type) {
                case "DELETE":
                    // Assign current event (before) data to the newData variable
                    newData = currentData[0].before;

                    // Find index of the deleted product in the current array, if it was there
                    let index = data.findIndex(p => p.id === newData.id);

                    // If product is present, index will be gt -1
                    if (index > -1) {
                        data = data.filter(p => p.id !== newData.id);
                       io.emit('update', {prods: [...data], type: "DELETE"});
                    } else {
                        return;
                    }
                    break;

                case "UPDATE":
                    newData = currentData[0].after;

                    // Find index of the deleted product in the current array, if it was there
                    let index2 = data.findIndex(p => p.id === newData.id);

                    // If product is present, index will be gt -1
                    if (index2 > -1) {
                        data[index2] = newData;
                       io.emit('update', {prods: data[index2], type: "UPDATE"});
                    } else {
                        return;
                    }
                    break;

                case "INSERT":
                    database.table('wallet')
                        .withFields(['id', 'username', 'balance'])
                        .sort({id: -1})
                        .getAll()
                        .then(prods => {
                            data = prods;
                            io.emit('update', {prods: [...data]});
                        })
                        .catch(err => console.log(err));
                    break;
                default:
                    break;
              }
        }
    });
    
  
 
  instance.on(MySQLEvents.EVENTS.CONNECTION_ERROR, console.error);
  instance.on(MySQLEvents.EVENTS.ZONGJI_ERROR, console.error);
};

program()
  .then(spinner.start.bind(spinner))
  .catch(console.error);


  io.on('connection', socket => {

  setInterval(function(){
  
    socket.emit('ping', 'pong' );

 
  }, 15000);

 
    socket.on('news_by_index', function (data){

      socket.emit('index_on', data);
    
  });
});

server.listen(PORT, () => 
              console.log(`BTCTicker server running on port ${PORT}`)
             );
