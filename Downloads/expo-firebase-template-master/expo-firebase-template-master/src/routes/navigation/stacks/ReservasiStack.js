import React, { useContext } from 'react'
import { createStackNavigator } from '@react-navigation/stack'
import { pemesanan, Reservasi } from '../../../scenes/reservasi'

const Stack = createStackNavigator()

export const Reservasistack = () => {
  return (
    <Stack.Navigator
      screenOptions={({ route, navigation }) => ({
        headerShown: false,
      })}
    >
      <Stack.Screen name="Reservasi" component={Reservasi} />
      <Stack.Screen name="pemesanan" component={pemesanan} />
    </Stack.Navigator>
  )
}
