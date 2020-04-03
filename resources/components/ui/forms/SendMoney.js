import React from 'react';
import SelectUserBlock from "../micro/SelectUserBlock";
import {MDBDataTable} from "mdbreact";
class SendMoney extends React.Component{
    state={
    }
    getUserImage= username=>{
        let url="/public/uploads/images/user/default.png";
        axios.get(`/public/uploads/images/user/${username}.jpg`)
            .then(response=>{
                url=`/public/images/user/${username}.jpg`;
            }).catch(reason => {})
        return url;
    }
    handleInput = (e) =>{
        this.setState({[e.target.name]: e.target.value});
    }
    render() {
        return (
            <div className="card h1 " style={{minHeight:'600px'}}>
                <div className="card-title  bg-gradient-yellow">
                    <div className="card-header">
                        <h4 className="text-bold">Send Money</h4>
                    </div>
                </div>
                <div className="card-body">
                    <div className="row">
                        <SelectUserBlock handle={this.props.match.params.handle} />
                        <div className="col-md-6 col-sm-12 col-lg-6 col-12 col-xl-6 ">
                            <div className="card" style={{minHeight:'550px'}}>
                                <div className="card-title">
                                    <div className="card-header">
                                        <div className="pull-right">
                                            <h6 className="text-bold">Favorite Contacts</h6>
                                        </div>
                                    </div>
                                    <div className="card-body">
                                        <MDBDataTable
                                            striped
                                            responsive
                                            data='/endpoint/fetch/my-fav'
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        )
    }
}
export default SendMoney;