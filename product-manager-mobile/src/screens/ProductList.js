import React, { Component } from 'react';
import { View, Text, StyleSheet, FlatList } from 'react-native';

class Home extends Component {
    state = {
        prod: []
    }

    goProduct = id => {
        this.props.navigation.push('', {
            id
        });
    }

    async getProducts () {
        try {
            const result = await fetch(`https://garzon-product-manager-unet.herokuapp.com/api/product`)
            const prods = await result.json()
            console.log(prods.results)
            this.setState({
                prod: prods.results
            })
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
                    Products
                </Text>
                <FlatList
                    ListEmptyComponent={() => (<View><Text style={{
                        color: '#434343',
                        fontSize: 18,
                        padding: 20
                    }}>loading...</Text></View>)}
                    data={this.state.prod}
                    renderItem={({ item, i }) => (
                        <View key={i}>
                            <Text style={{
                                color: '#000000',
                                fontSize: 24,
                                margin: 8,
                            }}>{item.Nb_Producto} - id: {item.Co_Producto}</Text>
                        </View>
                    )}
                />
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
