const api = require('termux-api')
 
if (!api.hasTermux) process.exit(1)
 
api.vibrate()
   .duration(1000)
   .run()
 
api.clipboardGet()
   .run()
   .then(function (text) {
     // ...
   })
