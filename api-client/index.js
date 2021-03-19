const axios = require('axios').default;

class Api {
    baseUrl = 'http://127.0.0.1:8000'

    constructor () {}
    
    getUser () {
        axios.get(`${this.baseUrl}/api/user`)
            .then(function (response) {
            console.log(response.data.users);
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            });
    }

    getUserById (id) {
        axios.get(`${this.baseUrl}/api/user/${id}`)
            .then(function (response) {
            console.log(response.data.users);
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            });
    }

    getCategory () {
        axios.get(`${this.baseUrl}/api/category`)
            .then(function (response) {
            console.log(response.data.results);
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            });
    }

    getCategoryById (id) {
        axios.get(`${this.baseUrl}/api/category/${id}`)
            .then(function (response) {
            console.log(response.data.results);
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            });
    }

    getProduct () {
        axios.get(`${this.baseUrl}/api/product`)
            .then(function (response) {
            console.log(response.data.results);
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            });
    }

    getProductById (id) {
        axios.get(`${this.baseUrl}/api/product/${id}`)
            .then(function (response) {
            console.log(response.data.results);
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            });
    }
}

module.exports = Api

const api = new Api();

api.getUser();
api.getUserById(2)
api.getCategory();
api.getCategoryById(12);
api.getProduct();
api.getProductById(13);