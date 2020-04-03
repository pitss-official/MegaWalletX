import React from 'react';
import { MDBDataTable } from 'mdbreact';
class MyTransactions extends React.Component{
    render(){
    return (

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
    );
}
}
export default MyTransactions;