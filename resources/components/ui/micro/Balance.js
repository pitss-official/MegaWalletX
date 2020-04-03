import React from "react";
const toastr = require("toastr");
export default class Balance extends React.Component{
    state={
        balance:'Loading ...'
    }
    fetchBalanceListener=()=>{
        axios.post('/endpoint/fetch/my-balance').then(response=>{
            this.setState(response.data);
        })
    }
    updateInterval;
    componentDidMount() {
        this.updateInterval = setInterval(() => {
            this.fetchBalanceListener()
        }, 1000);
    }

    componentWillUnmount() {
        clearInterval(updateInterval);
    }
    // componentDidMount() {
    //     setInterval(this.fetchBalanceListener(),500)
    // }

    render() {
        return(
        <li className="nav-item mr-2">
            <div className="btn rounded-pill" style={{border:'solid 0.5px blue'}}><i className="fas fa-wallet fa-align-left"></i> Rs. {this.state.balance}</div></li>
        )
    }
}