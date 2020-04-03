import React from 'react';
import Swal from 'sweetalert2';
class GiftCards extends React.Component{
    state={
    //    all variables here
        //where does this api lead
    }
    handleChange=e=>{
        console.log(this.state)
        this.setState({
            [e.target.name]:e.target.value
        })
    }
    submitData=()=>{
        axios.post('/endpoint/generate/card',this.state).then(
            response=>(response.data.result=="success"?Swal.fire('Gift Card Sent','You have successfully sent the gift card','success'):Swal.fire("Some Error Occurred",'Error Occurred while processing your request','error')
            ))
    }
    render() {
        return (
            <div className="card "
                 style={
                     {
                         minHeight:'600px',
                         backgroundImage: 'url("/public/assets/gift-b.jpg")',
                         backgroundRepeat:'no-repeat',
                         backgroundPosition:'center',
                         backgroundSize:'contain',
                         backgroundAttachment: 'fixed'
            }}
            >
                <div className="card-title bg-gradient-yellow">
                    <div className="card-header">
                        <h4 className="text-bold">Send Gift Voucher</h4>
                    </div>
                </div>
                <div className="card-body">
                    <div className="d-flex justify-content-center">
                        <div className="row">
                            <div className="col">
                                <img src="https://www.lovelychocos.com/lovelyadmin/uploads/blogs/_personalized%20gifts-lovelychocos.jpg" width="100%" height="250px"/><br/>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div className="d-flex justify-content-center">
                        {/*this is two way binding*/}
                        <input className="w-50 rounded-pill p-1 pl-2 text-center" onChange={this.handleChange} value={this.state.user} required="required" name="user" placeholder="User Handle" />
                    </div><br/>
                    <div className="d-flex justify-content-center">
                        <input className="w-50 rounded-pill p-1 pl-2 text-center" onChange={this.handleChange} value={this.state.amount} required="required" name="amount" type="number" placeholder="Amount" />
                    </div><br/>
                    <div className="d-flex justify-content-center">
                        <input className="w-50 rounded-pill p-1 pl-2 text-center" onChange={this.handleChange} value={this.state.message} required="required" name="message" placeholder="Message for the reciever" />
                    </div>
                    <br/><br/>
                    <div className="d-flex justify-content-center">
                    <button className=" btn btn-success rounded-pill" onClick={this.submitData}>Send Now</button>
                    </div>
                    </div>
                </div>
        )
    }
}
export default GiftCards;