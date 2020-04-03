import React from 'react';
import Select from 'react-select';
import Swal from 'sweetalert2'

class SelectUserBlock extends React.Component {
    getUserImage= username=>{
        let url="/public/uploads/images/user/default.png";
        axios.get(`/public/uploads/images/user/${username}.jpg`)
            .then(response=>{
                url=`/public/images/user/${username}.jpg`;
            }).catch(reason => {})
        return url;
    }
    state = {
        selectedOption: null,
        options : [
        ]
};
    handleChange = selectedOption => {
        this.setState(
            { selectedOption }
        );
    };
    handleAmount= e=>{
        this.setState({[e.target.name]:e.target.value})
    }
    submitData= ()=>{
        axios.post('/endpoint/init/transaction',{
            amount:this.state.amount,
            user:this.state.selectedOption.value
        }).then(response=>response.data.result=="success"?
            Swal.fire('Payment Successful',"You have successfully sent the money",'success'):Swal.fire(
                'Error Occurred','Some Error Occurred while processing your request','error'
            )
        )
    }
    componentDidMount() {
        if (this.props.handle!=undefined){
            axios.post('/endpoint/fetch/user-real-name',{username:this.props.handle}).then(
                response=>{
                    if(response.data==false)
                        Swal.fire('Invalid URL Handle','Invalid Payment URL Handler','warning')
                    else{
                        this.handleChange({
                            value:response.data.username,
                            label:response.data.name,
                            id:response.data.id,
                        })
                    }
                }
            )
        }
        axios.post('/endpoint/fetch/payables').then(response=>this.setState({options:response.data}))
    }
    render() {
        const { selectedOption } = this.state;

        return (
            <div className="col-md-6 col-sm-12 col-lg-6 col-12 col-xl-6 ">
                <div hidden={this.state.selectedOption===null?false:true}>
                <img width="100%" src="https://cdn.dwolla.com/com/prod/20190212160820/featured-image-v1.jpg" alt="Send Money"/>
                </div>
                <div className="h5">
                    <Select
                        placeholder={`Type name or user handle or select from list`}
                        value={selectedOption}
                        onChange={this.handleChange}
                        options={this.state.options}
                    />
                </div>
                <br/>
                <div hidden={this.state.selectedOption===null?true:false}>
                <div className="card card-primary card-outline">
                    <div className="card-body box-profile">
                        <div className="text-center">
                            <img className="profile-user-img img-fluid img-circle"
                                 src={
                                     this.state.selectedOption!=null?this.getUserImage(this.state.selectedOption.value):''
                                 }/>
                        </div>
                        <h3 className="profile-username text-center">{this.state.selectedOption!=null?this.state.selectedOption.value:''}</h3>
                        <p className="text-muted text-center h3">{this.state.selectedOption!=null?this.state.selectedOption.label:''}</p>
                        <br/>
                        <h4 className="profile-username text-center">
                            <input value={this.state.amount} name="amount" required="required" onChange={this.handleAmount} className="h2 btn rounded-pill" style={{border:'solid 0.5px blue',width:'200px'}} type="number" placeholder="Enter Amount eg. Rs. 2000"/>
                        </h4>
                        <button onClick={this.submitData} className="btn btn-primary btn-block" ><b>Pay Now</b></button>
                    </div>
                </div></div>
            </div>

        );
    }
}
export default SelectUserBlock;