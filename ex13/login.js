import './App.css';
import React, { useState } from 'react';
import { BrowserRouter as Router, Route, useNavigate, Routes } from 'react-router-dom';

const Login = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const navigate = useNavigate();

    const handleFormSubmit = (e) => {
        e.preventDefault();
        if (username === 'rec' && password === 'rec123') {
            navigate('/Welcome', { replace: true });
        } else {
            navigate('/Signup', { replace: true });
        }
    };
    return (
        <div>
            <h1>Login</h1>
            <div id="box">
                <form autoComplete='off' onSubmit={handleFormSubmit}>
                    Username:<br />
                    <input type="text" required value={username} onChange={(e) => setUsername(e.target.value)}/><br /><br />
                    Password:<br />
                    <input type="password" required value={password} onChange={(e) => setPassword(e.target.value)}/><br /><br />
                    <input type="submit" value="Login" />
                </form>
            </div>
        </div>
    );
   };

export default Login;
