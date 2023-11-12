const express = require('express');
const fs = require('fs');

const app = express();
const port = 3000;

// Set up middleware to parse JSON data
app.use(express.json());

app.post('/write-to-file', (req, res) => {
    const data = req.body;

    if (data) {
        const content = `Data: ${JSON.stringify(data)}\n\n`;

        fs.appendFile('data.txt', content, (err) => {
            if (err) {
                console.error('Error writing to file:', err);
                res.status(500).send('Internal Server Error');
            } else {
                console.log('Data written to file successfully.');
                res.send('Data written to file successfully.');
            }
        });
    } else {
        res.status(400).send('Bad Request: No data received.');
    }
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
