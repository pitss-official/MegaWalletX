import React from 'react';

const Footer = ()=>(
    <footer className="main-footer">
        <div className="float-right d-none d-sm-inline">
            {app.name} - Your one place for all payment needs.
        </div>
        <strong>Copyright &copy; 2020 <a href="/">{app.name}</a> Developed By Pawan Kumar & Anukriti Gupta.</strong> All
        rights reserved.
    </footer>
);
export default Footer;