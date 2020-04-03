import React from 'react';
import MyComponent from "./MyComponent";
import MyTransactions from "./forms/MyTransactions";
import GiftCards from "./forms/GiftCards";

class Dashboard extends React.Component{
    state={
        pendingGiftCards:4
    }
    render() {
        return (
            <div>
                {this.state.pendingGiftCards}
            </div>
        )
    }
}
export default Dashboard;