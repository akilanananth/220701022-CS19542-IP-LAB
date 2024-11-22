import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Welcome from './Welcome';
import Signup from './Signup';
import Login from './Login';

const App = () => {
 return (
 <Router>
 <Routes>
 <Route exact path="/" element={<Login />} />
<Route exact path="/Welcome" element={<Welcome />} />
 <Route path="/Signup" element={<Signup />} />
 </Routes>
 </Router>
 );
};
export default App;

