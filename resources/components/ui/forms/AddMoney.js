import React from 'react';
import Swal from "sweetalert2";
class AddMoney extends React.Component {
    state={

    }
    handleChange = e=>{
        this.setState({
            [e.target.name]:e.target.value
        })
    }
    submitData = ()=>{
        axios.post('/endpoint/add-balance',this.state).then(response=>{
            if (response.data.result=="success")
                Swal.fire("Transaction Successful",`Add Money Successful<br>Transaction ID: ${response.data.id}`,'success');
            else{
                Swal.fire("Transaction Failed",`<b>Transaction Failed</b> due to multiple errors`,'error');
            }
        })
}

    render() {
    return(
        <div className="card rounded-lg shadow-sm">
            <div className="card-title  bg-gradient-yellow">
                <div className="card-header">

                    <h4 className="text-bold">Add Money to Wallet</h4>
                </div>
            </div>
            <div className="card-body">
        <div className="container">
            <div className="row">
                <div className="col-lg-12 mx-auto">
                    <div className=" rounded-lg shadow-sm p-5">
                        <div className="form-group">
                            <label htmlFor="amount">Amount</label>
                            <input onChange={this.handleChange} type="text" name="amount" value={this.state.amount} required
                                   className="form-control"/>
                        </div>
                        <ul role="tablist" className="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                            <li className="nav-item">
                                <a data-toggle="pill" href="#nav-tab-card" className="nav-link active rounded-pill">
                                    <i className="fa fa-credit-card"></i>
                                    Credit Card
                                </a>
                            </li>
                            <li className="nav-item">
                                <a data-toggle="pill" href="#nav-tab-upi" className="nav-link rounded-pill">
                                    <i className="fa fa-credit-card"></i>
                                    BHIM/UPI
                                </a>
                            </li>
                            <li className="nav-item">
                                <a data-toggle="pill" href="#nav-tab-paypal" className="nav-link rounded-pill">
                                    <i className="fa fa-cart-plus"></i>
                                    Paypal
                                </a>
                            </li>
                            <li className="nav-item">
                                <a data-toggle="pill" href="#nav-tab-bank" className="nav-link rounded-pill">
                                    <i className="fa fa-university"></i>
                                    Bank Transfer
                                </a>
                            </li>
                        </ul>
                        <div className="tab-content">
                            <div id="nav-tab-card" className="tab-pane fade show active">
                                {/*<p className="alert alert-success">Some text success or error</p>*/}
                                <form role="form" >

                                    <div className="form-group">
                                        <label htmlFor="username">Full name (on the card)</label>
                                        <input onChange={this.handleChange} type="text" name="username" placeholder="Jason Doe" required
                                               className="form-control"/>
                                    </div>
                                    <div className="form-group">
                                        <label htmlFor="cardNumber">Card number</label>
                                        <div className="input-group">
                                            <input onChange={this.handleChange} type="text" name="cardNumber" placeholder="Your card number"
                                                   className="form-control" required/>
                                                <div className="input-group-append">
                    <span className="input-group-text text-muted">
                                                <i className="fa fa-cc-visa mx-1"></i>
                                                <i className="fa fa-cc-amex mx-1"></i>
                                                <i className="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                                                </div>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className="col-sm-8">
                                            <div className="form-group">
                                                <label><span className="hidden-xs">Expiration</span></label>
                                                <div className="input-group">
                                                    <input type="number" placeholder="MM" name=""
                                                           className="form-control" required/>
                                                        <input type="number" placeholder="YY" name=""
                                                               className="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-sm-4">
                                            <div className="form-group mb-4">
                                                <label data-toggle="tooltip"
                                                       title="Three-digits code on the back of your card">CVV
                                                    <i className="fa fa-question-circle"></i>
                                                </label>
                                                <input type="text" required className="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <button onClick={this.submitData} type="button"
                                            className="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm
                                    </button>
                                </form>
                            </div>
                            <div id="nav-tab-upi" className="tab-pane fade">
                                <form role="form">

                                    <div className="form-group">
                                        <label htmlFor="username">UPI Address</label>
                                        <input onChange={this.handleChange} type="text" name="username" placeholder="address@bank" required
                                               className="form-control"/>
                                    </div>
                                    <button onClick={this.submitData} type="button"
                                            className="subscribe btn btn-primary btn-block rounded-pill shadow-sm">Request Money
                                    </button>
                                </form>
                            </div>
                            <div id="nav-tab-paypal" className="tab-pane fade">
                                <p>Paypal is easiest way to pay online</p>
                                <p>
                                    <button onClick={this.submitData} type="button" className="btn btn-primary rounded-pill"><i
                                        className="fa fa-cart-plus mr-2"></i> Log into my Paypal
                                    </button>
                                </p>
                                <p className="text-muted">By proceeding to add money you accept the terms and conditions imposed by {app.name}
                                </p>
                            </div>
                            <div id="nav-tab-bank" className="tab-pane fade">
                                <h6>Bank account details</h6>
                                <dl>
                                    <dt>Bank</dt>
                                    <dd> STATE BANK OF INDIA</dd>
                                </dl>
                                <dl>
                                    <dt>Account number</dt>
                                    <dd>1234567890123</dd>
                                </dl>
                                <dl>
                                    <dt>IFSC</dt>
                                    <dd>SBIN000XX00</dd>
                                </dl>
                                <p className="text-muted">
                                    Transfer amount of your choice to this account to add money.
                                    The amount may take upto 7 days to reflect in your wallet.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div></div>
        </div>
        )
}
}
export default AddMoney;