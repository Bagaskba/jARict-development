import React from 'react'
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs'
import { createStackNavigator } from '@react-navigation/stack'
import FontIcon from 'react-native-vector-icons/FontAwesome5'
import { colors } from 'theme'
import { Reservasi } from '../../../scenes/reservasi'
import { Reservasistack } from '../stacks/ReservasiStack'

// stack navigators
import { HomeNavigator, ProfileNavigator, ConnectNavigator } from '../stacks'

const Tab = createBottomTabNavigator()
const Stack = createStackNavigator()
const TabNavigator = () => {
  return (
    <Tab.Navigator
      options={{
        tabBarStyle: {
          // backgroundColor: 'white',
          // borderTopColor: 'gray',
          // borderTopWidth: 1,
          // paddingBottom: 5,
          // paddingTop: 5,
        },
      }}
      defaultScreenOptions={{
        headerShown: false,
        headerTransparent: true,
      }}
      screenOptions={({ route }) => ({
        headerShown: false,
        tabBarActiveTintColor: colors.lightPurple,
        tabBarInactiveTintColor: colors.gray,
      })}
      initialRouteName="HomeTab"
      swipeEnabled={false}
    >
      <Tab.Screen
        name="HomeTab"
        component={HomeNavigator}
        options={{
          tabBarLabel: 'Home',
          tabBarIcon: ({ color, size }) => (
            <FontIcon name="home" color={color} size={size} />
          ),
        }}
      />
      <Tab.Screen
        name="ProdukTab"
        component={ConnectNavigator}
        options={{
          tabBarLabel: 'Produk',
          tabBarIcon: ({ color, size }) => (
            <FontIcon name="shopping-cart" color={color} size={size} />
          ),
        }}
      />
      <Tab.Screen
        name="Reservasi"
        component={Reservasistack}
        options={{
          tabBarLabel: 'Reservasi',
          tabBarIcon: ({ color, size }) => (
            <FontIcon name="book" color={color} size={size} />
          ),
        }}
      />
      <Tab.Screen
        name="Profile"
        component={ProfileNavigator}
        options={{
          tabBarLabel: 'Profile',
          tabBarIcon: ({ color, size }) => (
            <FontIcon name="user" color={color} size={size} />
          ),
        }}
      />
    </Tab.Navigator>
  )
}

export default TabNavigator
