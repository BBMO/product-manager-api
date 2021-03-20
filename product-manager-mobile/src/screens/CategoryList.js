import React, { Component } from 'react';
import { View, Text, StyleSheet } from 'react-native';

class Home extends Component {
    goProduct = id => {
        this.props.navigation.push('', {
            id
        });
    }

    async getProducts () {
        try {
            const result = await fetch(`http://127.0.0.1:8000/api/product`)
            console.log(result)
        } catch (ex) {
            return Promise.reject(ex.message)
        }
    }

    async componentDidMount() {
        try {
            const data = await this.getProducts()
            console.log(data)
        } catch (ex) {
            console.error(ex)
        }
    }

    render () {
        return (
            <View style={styles.container}>
                <Text style={styles.title}>
                    Categories
                </Text>
            </View>
        );
    }
}

const styles = StyleSheet.create({
    btn: {
        backgroundColor: '#F5F5F5',
        borderRadius: 4,
        margin: 32,
        minWidth: 120,
        justifyContent: 'center',
        alignItems: 'center',
        borderBottomWidth: 2,
        borderBottomColor: '#c2c2c2'
    },
    listBtn: {
        color: '#000',
        fontWeight: '800',
        margin: 18,
        fontSize: 18,
    },
    version: {
        padding: 10,
    },
    versionText: {
        fontSize: 9
    },
    img: {
        resizeMode: 'contain'
    },
    container: {
        backgroundColor: '#FFFFFF',
        flex: 1
    },
    title: {
        fontSize: 32,
        color: '#434343',
        fontWeight: '900',
        textAlign: 'center',
        marginTop: 32,
        marginBottom: 0,
    },
    imgContainer: {
        marginTop: 26,
        justifyContent: 'center',
        alignItems: 'center',
        flex: 1,
        marginBottom: 32
    }
})

export default Home;