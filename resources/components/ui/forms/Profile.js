import React from 'react'

class Profile extends React.Component{
    render() {
        return(
            <div>
                <div class="row justify-content-center">
                    <div class="col-md-10 mt-5">

                        <div class="card card-primary">
                            <div class="card-header bg-gradient-yellow">
                                <h3 class="card-title">Add Money</h3>
                            </div>
                            <form  class="p-2">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value={user.name}/>

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value={user.email}/>

                                </div>
                                <div class="form-group">
                                    <label >Change profile thumbnail</label>
                                    <input type="file" class="form-control" />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-gradient-yellow">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        )
    }
}
export default Profile;