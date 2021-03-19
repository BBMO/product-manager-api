import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import HomeStack from './src/stacks/Main';

const App = () => {
  return (
    <NavigationContainer>
      <HomeStack />
    </NavigationContainer>
  );
}

export default App;
