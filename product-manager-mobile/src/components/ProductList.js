import React, { Component } from 'react';
import { View, Text, Image, StyleSheet } from 'react-native';
import { TouchableOpacity } from 'react-native-gesture-handler';

class Home extends Component {
    handleListing = () => {
        alert('go to listing')
    }

    render () {
        return (
            <View style={styles.container}>
                <Text style={styles.title}>
                    select categori
                </Text>
                <Text style={styles.title}>
                    select sub-categori
                </Text>

                <View style={styles.imgContainer}>
                   <Text>FlastList here</Text>
                </View>
            </View>
        );
    }
}

const styles = StyleSheet.create({
})

export default Home;
