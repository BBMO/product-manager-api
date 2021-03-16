// @flow
import React from 'react'
import ReactDOM from 'react-dom'

const AppContainer = () => {
    return <h1>App container</h1>
}

export default function () {
    ReactDOM.render(
        <AppContainer />
        ,
        document.getElementById('root')
    )
}
