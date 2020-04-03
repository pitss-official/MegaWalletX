import React from "react";
import Swal from "sweetalert2";
class ScheduleTransaction extends React.Component{
    state={}
    handleChange = e =>{
        this.setState({[e.target.name]:e.target.value});
    }
    submitData= ()=>{
        axios.post('/endpoint/schedule',this.state).then(response=>response.data.result=="success"?
            Swal.fire('Payment Successful',"You have successfully sent the money",'success'):Swal.fire(
                'Error Occurred','Some Error Occurred while processing your request','error'
            )
        )
    }
    render() {
        return (
            <div className="card" style={{minHeight:'600px'}}>
                <div className="card-title bg-gradient-yellow">
                    <div className="card-header">
                        <h4 className="text-bold">Schedule a Future Transaction</h4>
                    </div>
                </div>
                <div className="card-body">
                    <div className="d-flex justify-content-center">
                        <h3>Schedule a New Transaction</h3><br/></div><hr/>
                    <div className="d-flex justify-content-center">
                        <input onChange={this.handleChange} value={this.state.name} className="rounded p-1" type="text" name="user" required={true} placeholder="Enter a user handle"/>
                    </div><br/>
                    <div className="d-flex justify-content-center">
                        <input onChange={this.handleChange} value={this.state.amount} className="rounded p-1" type="number" required={true} name="amount" placeholder="Amount in Rs."/>
                    </div><br/>
                    <div className="d-flex justify-content-center">
                    </div>
                    <div className="d-flex justify-content-center">
                        <button className="btn btn-success" onClick={this.submitData}>Schedule</button>
                    </div>
                </div>
            </div>
        )
    }
}
export default ScheduleTransaction;