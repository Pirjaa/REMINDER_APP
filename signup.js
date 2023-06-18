
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

// Create Express app
const app = express();

// Set up body-parser middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Connect to MongoDB
mongoose.connect('mongodb://localhost/mydatabase', { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('Connected to MongoDB'))
  .catch(error => console.log('Error connecting to MongoDB:', error));

// Create a schema for the user collection
const userSchema = new mongoose.Schema({
  username: String,
  password: String
});

// Create a model based on the schema
const User = mongoose.model('User', userSchema);

// Define the route for signup
app.post('/signup', (req, res) => {
  const { username, password } = req.body;
  
  // Create a new user document
  const newUser = new User({ username, password });

  // Save the user to the database
  newUser.save()
    .then(() => res.send('User registered successfully'))
    .catch(error => res.status(500).send('Error registering user'));
});

// Start the server
app.listen(3000, () => {
  console.log('Server started on port 3000');
});
