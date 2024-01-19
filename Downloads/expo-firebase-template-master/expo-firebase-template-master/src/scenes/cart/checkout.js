import React, { useEffect, useContext, useState } from 'react'
import {
  Text,
  View,
  StyleSheet,
  ScrollView,
  Image,
  TouchableOpacity,
} from 'react-native'
import ScreenTemplate from '../../components/ScreenTemplate'
import Button from '../../components/Button'
import { colors, fontSize } from 'theme'
import { ColorSchemeContext } from '../../context/ColorSchemeContext'
import { UserDataContext } from '../../context/UserDataContext'
import { useNavigation } from '@react-navigation/native'
import TextInputBox from '../../components/TextInputBox'
import Headerlogo from '../../components/Headerlogo'
import { visa, jnt, jne, serum } from '../../../assets'

export default function checkout() {
  const navigation = useNavigation()
  const [input, setInput] = useState('')
  const [number, setNumber] = useState('')
  const [input2, setInput2] = useState('')
  const { userData } = useContext(UserDataContext)
  const { scheme } = useContext(ColorSchemeContext)
  const isDark = scheme === 'dark'
  const colorScheme = {
    text: isDark ? colors.white : colors.primaryText,
  }
  const [isChecked, setIsChecked] = useState(false)
  const [isCheckedBottom, setIsCheckedBottom] = useState(false)

  const handleCheck = () => {
    setIsChecked(!isChecked)
  }
  const handleCheckBot = () => {
    setIsCheckedBottom(!isCheckedBottom)
  }

  useEffect(() => {
    console.log('Checkout screen')
  }, [])

  const buttonPress = () => {
    navigation.navigate('keranjang')
    // console.log('button press')
  }
  const [count, setCount] = useState(0)

  const handleIncrement = () => {
    setCount(count + 1)
  }

  const handleDelete = () => {
    console.log('data deleted')
  }

  const handleDecrement = () => {
    if (count > 0) {
      setCount(count - 1)
    }
  }

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View style={{ alignItems: 'center', paddingVertical: 20 }}>
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Checkout
        </Text>
      </View>
      <ScrollView style={styles.main}>
        <Text
          style={{
            paddingLeft: 10,
            fontSize: 20,
            fontWeight: 'bold',
            paddingVertical: 10,
          }}
        >
          Items
        </Text>
        <View
          style={[
            styles.cardContain,
            { paddingHorizontal: 20, paddingVertical: 20 },
          ]}
        >
          <Image source={serum} style={{ marginLeft: 25 }} />
          <View style={{ flexDirection: 'column', marginTop: 20 }}>
            <Text
              style={[
                styles.marginbot,
                {
                  textTransform: 'uppercase',
                  fontWeight: 'bold',
                  fontSize: 15,
                },
              ]}
            >
              Serum
            </Text>
            <Text style={{ marginTop: 10 }}>Rp.125.000,00</Text>
            <Text style={{ marginTop: 10 }}>Jumlah : 1</Text>
            <TouchableOpacity
              onPress={handleDelete}
              style={{
                position: 'absolute',
                left: 150,
                borderWidth: 1,
                borderColor: colors.warnaFont,
                borderRadius: 5,
              }}
            >
              <Text style={{ color: 'red', fontWeight: 'bold', fontSize: 18 }}>
                X
              </Text>
            </TouchableOpacity>
          </View>
        </View>
        <Text
          style={{
            paddingLeft: 10,
            fontSize: 20,
            fontWeight: 'bold',
            paddingVertical: 10,
          }}
        >
          Alamat Pengiriman
        </Text>
        <View
          style={[
            styles.cardContain,
            {
              paddingHorizontal: 20,
              paddingVertical: 20,
              flexDirection: 'column',
            },
          ]}
        >
          <TextInputBox
            placeholder="Nama"
            onChangeText={(text) => setInput(text)}
            autoCapitalize="none"
            value={input}
            keyboardType={'email-address'}
          />
          <TextInputBox
            placeholder="No Hp"
            onChangeText={(text) => setNumber(text)}
            autoCapitalize="none"
            value={number}
            keyboardType={'numeric'}
          />
          <TextInputBox
            placeholder="Alamat"
            onChangeText={(text) => setInput2(text)}
            autoCapitalize="none"
            value={input2}
            keyboardType={'email-address'}
          />
        </View>
        <Text
          style={{
            paddingLeft: 10,
            fontSize: 20,
            fontWeight: 'bold',
            paddingVertical: 10,
          }}
        >
          Jasa Pengiriman
        </Text>
        <View
          style={[
            styles.cardContain,
            {
              paddingHorizontal: 20,
              paddingVertical: 20,
              flexDirection: 'column',
            },
          ]}
        >
          <View style={{ flexDirection: 'row' }}>
            <Image source={jne} />
            <Image source={jnt} style={{ marginTop: 10 }} />
          </View>
        </View>
        <Text
          style={{
            paddingLeft: 10,
            fontSize: 20,
            fontWeight: 'bold',
            paddingVertical: 10,
          }}
        >
          Metode Pembayaran
        </Text>
        <View
          style={[
            styles.cardContain,
            {
              paddingHorizontal: 20,
              paddingVertical: 20,
              flexDirection: 'column',
            },
          ]}
        >
          <View style={{ flexDirection: 'row' }}>
            <Image source={visa} />
          </View>
        </View>
        <View style={[styles.totalContain]}>
          <Text
            style={{
              paddingHorizontal: 20,
              color: 'white',
              fontWeight: 'bold',
              fontSize: 20,
            }}
          >
            Total Pembayaran
          </Text>
          <Text
            style={{
              color: colors.warnaFont,
              fontWeight: 'bold',
              fontSize: 20,
              paddingHorizontal: 20,
            }}
          >
            Rp. 0
          </Text>
        </View>

        <View style={{ paddingVertical: 20 }}>
          <Button
            label="Checkout"
            color={colors.warnaFont}
            onPress={() => buttonPress()}
          />
        </View>
      </ScrollView>
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  main: {
    flex: 1,
    width: '100%',
  },
  totalContain: {
    flexDirection: 'row',
    backgroundColor: '#DD7272',
    paddingVertical: 40,
    justifyContent: 'space-between',
    alignItems: 'center',
  },
  container: {
    flexDirection: 'row',
    alignItems: 'center',
  },

  cardContain: {
    display: 'flex',
    flexDirection: 'row',
    backgroundColor: '#D3ABAB',
    marginBottom: 20,
  },
  button: {
    fontSize: 20,
    padding: 6,
    borderWidth: 1,
    borderColor: 'black',
    borderRadius: 5,
    marginHorizontal: 5,
  },
  marginbot: {
    marginBottom: 10,
  },
})
