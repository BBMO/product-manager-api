import React from 'react';
import { createStackNavigator } from '@react-navigation/stack';
import Home from '../screens/Home'
import ProductList from '../screens/ProductList'
import CategoryList from '../screens/CategoryList'

const Stack = createStackNavigator();

const HomeStack = () => {
    return (
        <Stack.Navigator>
            <Stack.Screen name='Home' component={Home} />
            <Stack.Screen name='ProductList' component={ProductList} />
            <Stack.Screen name='CategoryList' component={CategoryList} />
        </Stack.Navigator>
    );
};

export default HomeStack;
