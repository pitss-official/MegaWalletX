import React from 'react'
import {BrowserRouter, Switch, Route, Link} from "react-router-dom";

import Dashboard from './ui/Dashboard';
import AddMoney from "./ui/forms/AddMoney";
import RequestLoan from "./ui/forms/RequestLoan";
// import ApproveLoan from "./ui/forms/ApproveLoan";
import GiftCards from "./ui/forms/GiftCards";
import MyTransactions from "./ui/forms/MyTransactions";
import SendMoney from "./ui/forms/SendMoney";
import Profile from "./ui/forms/Profile";
import ScheduleTransaction from "./ui/forms/ScheduleTransaction";
const Router = () => (
      <Switch>
          <Route path="/home" component={Dashboard} exact/>
          <Route path="/home/" component={Dashboard} exact/>
          <Route path="/pay" component={SendMoney} exact/>
          <Route path="/pay/:handle" component={SendMoney} key={window.location.pathname} exact/>
          <Route path="/transactions" component={MyTransactions}/>
          <Route path="/gift" component={GiftCards}/>
          <Route path="/add-money/:amount" component={AddMoney}/>
          <Route path="/add-money" component={AddMoney}/>
          {/*<Route path="/loans" component={RequestLoan}/>*/}
          <Route path="/profile" component={Profile}/>
          <Route path="/schedule-transaction" component={ScheduleTransaction}/>
      </Switch>
);
export default Router;