const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const path = require('path');

const app = express();
app.use(bodyParser.json());
app.use(express.static('public'));

function merge(src, dst) {
    for (let key in src) {
        if (src.hasOwnProperty(key)) {
            if (typeof src[key] === 'object' && src[key] !== null) {
                if (!dst[key]) dst[key] = {};
                merge(src[key], dst[key]);
            } else {
                dst[key] = src[key];
            }
        }
    }
}

app.post('/merge', (req, res) => {
    try {
        const src = req.body;
        merge(src, Object.prototype);
        res.send('Merged');
    } catch (error) {
        res.status(500).send('Error');
    }
});

app.get('/admin', (req, res) => {
    try {
        if ({}.isAdmin) {
            const flagPath = path.join(__dirname, 'flag.txt');
            const flagContent = fs.readFileSync(flagPath, 'utf8');
            res.send(flagContent);
        } else {
            res.status(403).send('Access denied');
        }
    } catch (error) {
        res.status(500).send('Error');
    }
});

app.use((err, req, res, next) => {
    res.status(500).send('Error');
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
