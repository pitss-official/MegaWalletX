import React,{Component} from 'react';
import Link from "react-router-dom/Link";
class LeftSideBar extends Component{
    state={
        user:{
            image_src:'/public/uploads/images/user/default.png'
        },
        site_users:[
        ]
    }
    componentDidMount() {
        this.setState({user:{
            image_src: this.getUserImage(user.username)
            }});
        axios.get('/endpoint/fetch/recent-payments').then(response=>this.setState({site_users:response.data}))
    }
    getUserImage= username=>{
        let url="/public/uploads/images/user/default.png";
         axios.get(`/public/uploads/images/user/${username}.jpg`)
            .then(response=>{
                url=`/public/images/user/${username}.jpg`;
            }).catch(reason => {})
        return url;
    }
    render() {
    return (
        <aside className="main-sidebar sidebar-dark-primary elevation-4">
            <div className="w-100 bg-gradient-yellow">
                <a href="/home" className="brand-link">
                    <img src="/public/assets/theme.svg" style={{marginLeft: '7px', width: '50px'}}
                         className="brand-image"/>
                    <span className="brand-text font-weight-bold">{app.name}</span>
                </a></div>
            <div className="sidebar">
                <div className="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div className="image">
                        <img src={this.state.user.image_src} className="img-circle elevation-2" alt={user.name}/>
                    </div>
                    <div className="info">
                        <a href="#" className="d-block">{user.name}</a>
                        <small className="text-cyan">{user.email}</small>
                    </div>
                </div>
                <nav className="mt-2">
                    <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {
                            this.state.site_users.map(user=>(
                                <li className="nav-item" key={`usernavlink-${user.username}`}>
                                    <Link to={`/pay/${user.username}`} className="nav-link">
                                        <img className="nav-icon fas" src={this.getUserImage(user.username)}></img>
                                        <p className="ml-1 p-0">
                                            {user.name.length>15?`${user.name.substr(0,20)}..`:user.name}
                                            <span className="fas right">
                                                    <i className="fa fa-1x fa-comment-dollar"></i>
                                            </span>
                                        </p>
                                    </Link>
                                </li>
                            ))
                        }
                    </ul>
                </nav>
            </div>
        </aside>
    )
}
}
export default LeftSideBar;