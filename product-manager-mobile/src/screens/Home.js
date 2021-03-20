import React, { Component } from 'react';
import { View, Text, Image, StyleSheet } from 'react-native';
import { TouchableOpacity } from 'react-native-gesture-handler';

class Home extends Component {
    handleListing = () => {
        this.props.navigation.push('ProductList')
    }

    handleCategories = () => {
        this.props.navigation.push('CategoryList')
    }

    componentDidMount() {
    }

    render () {
        return (
            <View style={styles.container}>
                <Text style={styles.title}>
                    Product Manager API
                </Text>

                <View style={styles.imgContainer}>
                    <Image
                        style={styles.img}
                        source={require('../assets/images/img1.jpeg')}
                    />

                    <TouchableOpacity style={styles.btn} onPress={this.handleListing}>
                        <Text style={styles.listBtn}>Products</Text>
                    </TouchableOpacity>
                    <TouchableOpacity style={styles.btn} onPress={this.handleCategories}>
                        <Text style={styles.listBtn}>Categories</Text>
                    </TouchableOpacity>
                </View>

                <View style={styles.version}>
                    <Text style={styles.versionText}>V0.5.0</Text>
                </View>
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
