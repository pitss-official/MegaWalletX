import React from 'react';
import MyComponent from "./MyComponent";
import MyTransactions from "./forms/MyTransactions";
import GiftCards from "./forms/GiftCards";
import {MDBDataTable} from "mdbreact";
import SelectUserBlock from "./micro/SelectUserBlock";

class Dashboard extends React.Component{
    state={
        pendingGiftCards:4
    }

    render() {
        return (
            <div className="mt-3">

                <div className="row">
                    <div className="col-lg-3 col-6">
                        <div className="small-box bg-info">
                            <div className="inner">
                                <h3 >₹ 2100</h3>

                                <p>Current Balance</p>
                            </div>
                            <div className="icon">
                                <i className="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>

                    <div className="col-lg-3 col-6">

                        <div className="small-box bg-success">
                            <div className="inner">
                                <h3 >5</h3>

                                <p>Pending Loan Requests</p>
                            </div>
                            <div className="icon">
                                <i className="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>

                    <div className="col-lg-3 col-6">

                        <div className="small-box bg-warning">
                            <div className="inner">
                                <h3 >4</h3>

                                <p>Available Gift Cards</p>
                            </div>
                            <div className="icon">
                                <i className="ion ion-person-add"></i>
                            </div>

                        </div>
                    </div>

                    <div className="col-lg-3 col-6">

                        <div className="small-box bg-danger">
                            <div className="inner">
                                <h3>24</h3>

                                <p>Total Transactions</p>
                            </div>
                            <div className="icon">
                                <i className="ion ion-pie-graph"></i>
                            </div>

                        </div>
                    </div>

                </div>







            <div className="row">
                <div className="col-md-4">
                    <div className="card">
                        <div className="card-title bg-gradient-yellow">
                            <div className="card-header">

                                <h4 className="text-bold">My Transactions</h4>
                            </div>
                        </div>
                <div className="card-body">
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


                <div className="col-md-8">
                    <div className="card">
                        <div className="card-title bg-gradient-yellow">
                            <div className="card-header">

                                <h4 className="text-bold">My Transactions</h4>
                            </div>
                        </div>
                        <div className="card-body">
                            <MDBDataTable
                                striped
                                bordered
                                responsive
                                hover
                                data='/endpoint/fetch/my-transactions'
                            />
                        </div>
                    </div>
                </div>
            </div>

    <div clas="row">
                <div className="justify-content-center col-md-12">
                    <h2 className="text-center label label-default bg-gradient-green">Available Gift
                        Cards</h2>
                    <div  >
                        <div className="col-md-6 mt-3" style={{position: 'relative', float: 'left'}}>
                            <div className="card rounded-0 border-0 card1 pr-xl-4 pr-lg-3 p-4">
                                <div className="row ">
                                    <div className="col-11">
                                        <h3 className=" mt-4 mb-4">Gift card</h3>
                                    </div>
                                </div>
                                <div className="row ">
                                    <div className="col-md-6 fit-image" style={{position: 'relative', float: 'left'}}><img
                                        src="/gift.png" height="150px" width="150px" /></div>


                                    <div className="col-md-6" style={{position: 'relative', float: 'left'}}>
                                        <h2>Value Rs 200</h2>
                                        <p>Sent by Anukriti</p>
                                        <p className="badge badge-info">Birthday gift</p>
                                        <br/>
                                            <button className="btn btn-success">Redeem</button>
                                    </div>
                                </div>

                            </div>


                        </div>


                    </div>

    </div>


                <div className="col-md-6 mt-3" style={{position: 'relative', float: 'left'}}>
                    <div className="card rounded-0 border-0 card1 pr-xl-4 pr-lg-3 p-4">
                        <div className="row ">
                            <div className="col-11">
                                <h3 className=" mt-4 mb-4">Gift card</h3>
                            </div>
                        </div>
                        <div className="row ">
                            <div className="col-md-6 fit-image" style={{position: 'relative', float: 'left'}}><img
                                src="/gift.png" height="150px" width="150px" /></div>


                            <div className="col-md-6" style={{position: 'relative', float: 'left'}}>
                                <h2>Value Rs 200</h2>
                                <p>Sent by Anukriti</p>
                                <p className="badge badge-info">Birthday gift</p>
                                <br/>
                                <button className="btn btn-success">Redeem</button>
                            </div>
                        </div>


                </div>


            </div>

        </div>








    </div>



        )
    }
}
export default Dashboard;