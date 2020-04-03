import React, {Component} from 'react';

class NavigationActionBlock extends Component {
    render() {
        return (
            <div className={`m-1 ${this.props.btnColor} btn-rounded info-box-icon elevation-1`}>
                <button className={`btn ${this.props.bg} `}>
                    <i className={`
                        ${this.props.iconAdditionalClass?this.props.iconAdditionalClass:''}
                        ${this.props.type}
                        fa-${this.props.iconSize}x 
                        ${this.props.digital == true ? 'fa-draft2digital' : ''} 
                        ${this.props.icon} mt-2 ml-3 mr-3 mb-1`}>
                    </i>
                </button>
                <p className={`text-center text-uppercase text-secondary mb-0 ${this.props.titleAdditionalClass}`}>{this.props.name}</p>
            </div>
        )
    }
}

export default NavigationActionBlock;