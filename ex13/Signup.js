import './App.css';
import { BrowserRouter as Router, Route, useNavigate, Routes } from 'react-router-dom';
const Signup = () => {
    const navigate = useNavigate();

    const handleFormSubmit = (e) => {
        navigate('/Welcome', { replace: true });
    };
    return (
        <div>
            <h1>Sign Up</h1>
            <div id="box">
                <form autoComplete="off" onSubmit={handleFormSubmit}>
                    Username:<br />
                    <input type="text" required /><br /><br />
                    Email:<br />
                    <input type="text" required /><br /><br />
                    Password:<br />
                    <input type="password" required /><br /><br />
                    <input type="submit" value="Register" />
                </form>
            </div>
        </div>
    );
};
export default Signup;

