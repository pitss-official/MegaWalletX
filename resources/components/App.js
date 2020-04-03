import React, {Component} from 'react';
import Footer from "./footer";
import LeftSideBar from "./LeftSideBar";
import NavigationActionBlock from "./ui/NavigationActionBlock";
import Router from './Router';
import Balance from "./ui/micro/Balance";
import {Link} from "react-router-dom";

class App extends Component {
    logoff = () => axios.post('/endpoint/process/logout').then(response => window.location.replace(response.data.url));
    state = {
        links: [
            {
                id: 'link-0',
                to: '/home',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-home",
                iconSize: "2",
                name: "Home",
            }, {
                id: 'link-1',
                to: '/add-money',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-hand-holding-usd",
                iconSize: "2",
                name: "Add Money",
            },
            {
                id: 'link-2',
                to: '/pay',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-comment-dollar",
                iconSize: "2",
                name: "Pay",
            }, {
                id: 'link-3',
                to: '/transactions',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-list",
                iconSize: "2",
                name: "History",
            }, {
                id: 'link-4',
                to: '/gift',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-gift",
                iconSize: "2",
                name: "gift card",
            },
            // {
            //     id: 'link-5',
            //     to: '/loans',
            //     type: "fas",
            //     iconAdditionalClass: "",
            //     icon: "fa-piggy-bank",
            //     iconSize: "2",
            //     name: "Loans",
            // },
            {
                id: 'link-6',
                to: '/schedule-transaction',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-clock",
                iconSize: "2",
                name: "Schedule",
            }, {
                id: 'link-7',
                to: '/profile',
                type: "fas",
                iconAdditionalClass: "",
                icon: "fa-user-circle",
                iconSize: "2",
                name: "Profile",
            },
        ]
    }

    render() {
        return (
            <div className="wrapper" id="root">
                <nav className="main-header navbar navbar-expand navbar-white navbar-light">
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <a className="nav-link" data-widget="pushmenu" href="#"><i className="fas fa-bars"></i></a>
                        </li>
                        {/*<li className="nav-item d-none d-sm-inline-block">*/}
                        {/*    <a href="/home" className="nav-link">Home</a>*/}
                        {/*</li>*/}
                        {/*<li className="nav-item d-none d-sm-inline-block">*/}
                        {/*    <a href="#" className="nav-link">Contact</a>*/}
                        {/*</li>*/}
                    </ul>
                    <ul className="navbar-nav ml-auto">
<Balance/>
                        <li className="nav-item">
                            <a className="nav-item" onClick={this.logoff}>
                                <button className="btn btn-danger"><i className="fas fa-power-off"></i></button>
                            </a>
                        </li>
                    </ul>
                </nav>
                <LeftSideBar/>
                <div className="content-wrapper">
                    <div className="content">
                        <div className="bg-gradient-light">
                            <div className="d-flex justify-content-center">
                                <div className="row m-1">
                                    {this.state.links.map(link => (
                                        <Link key={link.id} to={link.to}>
                                            <NavigationActionBlock
                                                btnColor="btn-warning"
                                                type={link.type}
                                                iconAdditionalClass={link.iconAdditionalClass}
                                                icon={link.icon}
                                                iconSize={link.iconSize}
                                                name={link.name}
                                            />
                                        </Link>
                                    ))}
                                </div>
                            </div>
                        </div>
                        <div className="container-fluid">
                            <Router/>
                        </div>
                    </div>
                </div>
                <aside className="control-sidebar control-sidebar-dark">
                    <div className="p-3">
                        <h5>Title</h5>
                        <p>Sidebar content</p>
                    </div>
                </aside>
                <Footer/>
            </div>
        )
    }
}
export default App;