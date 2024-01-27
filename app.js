// app.js
const http = require('http');

const server = http.createServer((req, res) => {
  res.writeHead(200, { 'Content-Type': 'text/plain' });
  res.end('Hello from Node.js!\n');
});

const PORT = 3000;
server.listen(PORT, () => {
  console.log(`Node.js server listening on port ${PORT}`);
});
