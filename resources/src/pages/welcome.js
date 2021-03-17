// @flow
import React from 'react'
import ReactDOM from 'react-dom'

import styles from './welcome.less'

const AppContainer = () => {
    return <h1 className='h1'>App container</h1>
}

window.onload = () => {
    ReactDOM.render(
        <AppContainer />
        ,
        document.getElementById('root')
    )
}
