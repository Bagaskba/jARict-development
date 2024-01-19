import React, { useContext } from 'react'
import { createStackNavigator } from '@react-navigation/stack'
import { cart, checkout, keranjang } from '../../../../scenes/cart'

import Follow from '../../../../scenes/follow'

const Stack = createStackNavigator()

export const FollowNavigator = () => {
  return (
    <Stack.Navigator
      screenOptions={({ route, navigation }) => ({
        headerShown: false,
      })}
    >
      <Stack.Screen name="Follow" component={Follow} />
      <Stack.Screen name="cart" component={cart} />
      <Stack.Screen name="checkout" component={checkout} />
      <Stack.Screen name="keranjang" component={keranjang} />
    </Stack.Navigator>
  )
}
